/* 
  Advanced To-Do App
  ==================
  Features:
  - Add / Edit / Delete tasks
  - Inline validation messages (no alert popups)
  - Mark tasks as complete/incomplete
  - Priority + Due date support
  - Search, filter, sort tasks
  - Drag & drop reordering
  - LocalStorage persistence (tasks remain after refresh)
  - Export / Import JSON backup
  - Theme toggle (dark/light)
*/

// ====== Shortcuts for selecting DOM elements ======
const qs = (s) => document.querySelector(s);              // Single element selector
const qsa = (s) => Array.from(document.querySelectorAll(s)); // Multiple elements as array

// ====== Getting all DOM elements ======
const taskInput = qs('#taskInput');          // Text input for task name
const addBtn = qs('#addBtn');                // Add/Update button
const prioritySelect = qs('#prioritySelect');// Dropdown for priority
const dueInput = qs('#dueInput');            // Date input for due date
const inputError = qs('#inputError');        // Inline error message span
const taskListEl = qs('#taskList');          // UL for task list
const remainingCount = qs('#remainingCount');// Count of remaining tasks
const emptyNote = qs('#emptyNote');          // "No tasks" note
const searchInput = qs('#searchInput');      // Search bar
const filterPriority = qs('#filterPriority');// Filter dropdown (priority)
const sortBy = qs('#sortBy');                // Sort dropdown
const clearCompletedBtn = qs('#clearCompleted'); // Clear completed tasks button
const exportBtn = qs('#exportJson');         // Export JSON button
const importBtn = qs('#importJson');         // Import JSON button
const importFile = qs('#importFile');        // Hidden file input for import
const themeToggle = document.getElementById("themeToggle"); // Theme toggle button

let tasks = [];       // Array of all tasks
let dragSrcEl = null; // For storing the dragged element reference

// ====== LocalStorage: Load saved tasks ======
function loadTasks(){
  try {
    const raw = localStorage.getItem('advanced_todo_tasks');
    tasks = raw ? JSON.parse(raw) : []; // If data exists → parse it, else empty array
  } catch(e){ 
    tasks = []; // If JSON parse fails, reset tasks
  }
}

// ====== Save tasks to LocalStorage ======
function saveTasks(){
  localStorage.setItem('advanced_todo_tasks', JSON.stringify(tasks));
}

// ====== Show and clear error messages ======
function showError(msg){
  inputError.textContent = msg || '';
  // Auto-hide error after 3 seconds
  if(msg) {
    setTimeout(() => { inputError.textContent = ''; }, 3000);
  }
}
function clearInputError(){ showError(''); }

// ====== Update task counter ======
function updateStats(){
  const remaining = tasks.filter(t => !t.completed).length;
  remainingCount.textContent = remaining;
}

// ====== Render tasks on UI ======
function render(){
  const q = (searchInput.value || '').toLowerCase(); // Search text
  const priorityFilter = filterPriority.value;       // Selected priority filter
  let list = tasks.slice(); // Clone tasks array

  // Search filter
  if(q) list = list.filter(t => t.text.toLowerCase().includes(q));

  // Priority filter
  if(priorityFilter !== 'all') list = list.filter(t => t.priority === priorityFilter);

  // Sorting logic
  const s = sortBy.value;
  if(s === 'createdDesc') list.sort((a,b) => b.createdAt - a.createdAt); // Newest first
  else if(s === 'createdAsc') list.sort((a,b) => a.createdAt - b.createdAt); // Oldest first
  else if(s === 'dueAsc') list.sort((a,b) => {
    if(!a.due) return 1; 
    if(!b.due) return -1; 
    return a.due.localeCompare(b.due);
  });
  else if(s === 'priorityDesc') list.sort((a,b) => priorityRank(b.priority) - priorityRank(a.priority));

  // Clear existing tasks & re-render
  taskListEl.innerHTML = '';
  emptyNote.style.display = list.length === 0 ? 'block' : 'none';
  list.forEach(task => taskListEl.appendChild(createTaskCard(task)));
  updateStats();
}

// ====== Convert priority to number for sorting ======
function priorityRank(p){ 
  if(p==='high') return 3; 
  if(p==='medium') return 2; 
  return 1; // Low
}

// ====== Create HTML for a single task card ======
function createTaskCard(task){
  const li = document.createElement('li');
  li.className = 'task-card';
  li.draggable = true;
  li.dataset.id = task.id;

  // === Drag & Drop Events ===
  li.addEventListener('dragstart', handleDragStart);
  li.addEventListener('dragover', handleDragOver);
  li.addEventListener('drop', handleDrop);
  li.addEventListener('dragend', handleDragEnd);

  // === Completion Checkbox ===
  const cb = document.createElement('div');
  cb.className = 'checkbox' + (task.completed ? ' checked' : '');
  cb.innerHTML = task.completed ? '✔' : '';
  cb.addEventListener('click', () => {
    task.completed = !task.completed;
    saveTasks();
    render();
  });

  // === Task Text ===
  const textSpan = document.createElement('span');
  textSpan.className = 'task-text' + (task.completed ? ' done' : '');
  textSpan.textContent = task.text;

  // === Meta Info (priority + due date) ===
  const meta = document.createElement('div');
  meta.className = 'task-meta';
  meta.textContent = `${task.priority.toUpperCase()} ${task.due ? '• Due: ' + task.due : ''}`;

  // === Action Buttons (Edit/Delete) ===
  const actions = document.createElement('div');
  actions.className = 'task-actions';

  const editBtn = document.createElement('button');
  editBtn.className = 'edit-btn';
  editBtn.textContent = '✏';
  editBtn.addEventListener('click', () => {
    // Fill input fields with task data for editing
    taskInput.value = task.text;
    prioritySelect.value = task.priority;
    dueInput.value = task.due || '';
    addBtn.textContent = 'Update';
    addBtn.dataset.editId = task.id; // Store which task to update
  });

  const delBtn = document.createElement('button');
  delBtn.className = 'delete-btn';
  delBtn.textContent = '🗑';
  delBtn.addEventListener('click', () => {
    tasks = tasks.filter(t => t.id !== task.id);
    saveTasks();
    render();
  });

  // Append everything into card
  actions.append(editBtn, delBtn);
  li.append(cb, textSpan, meta, actions);
  return li;
}

// ====== Event: Add/Update Task ======
addBtn.addEventListener('click', () => {
  const text = taskInput.value.trim();
  const priority = prioritySelect.value;
  const due = dueInput.value || null;

  // Validation
  if(!text){ showError('Task cannot be empty!'); return; }
  clearInputError();

  // If editing
  if(addBtn.dataset.editId){
    const id = addBtn.dataset.editId;
    const t = tasks.find(t => t.id === id);
    if(t){
      t.text = text;
      t.priority = priority;
      t.due = due;
    }
    addBtn.textContent = 'Add';
    delete addBtn.dataset.editId;
  } 
  // If adding new
  else {
    tasks.push({
      id: Date.now().toString(),
      text,
      completed: false,
      priority,
      due,
      createdAt: Date.now()
    });
  }

  // Reset input fields
  taskInput.value = '';
  prioritySelect.value = 'low';
  dueInput.value = '';
  saveTasks();
  render();
});

// ====== Search, Filter, Sort ======
searchInput.addEventListener('input', render);
filterPriority.addEventListener('change', render);
sortBy.addEventListener('change', render);

// ====== Clear Completed Tasks ======
clearCompletedBtn.addEventListener('click', () => {
  tasks = tasks.filter(t => !t.completed);
  saveTasks();
  render();
});

// ====== Theme Toggle ======
themeToggle.addEventListener('click', () => {
  document.body.classList.toggle('dark');
  localStorage.setItem('advanced_todo_theme', document.body.classList.contains('dark') ? 'dark' : 'light');
});

// ====== Export to JSON ======
exportBtn.addEventListener('click', () => {
  const blob = new Blob([JSON.stringify(tasks)], {type: 'application/json'});
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'todo_backup.json';
  a.click();
  URL.revokeObjectURL(url);
});

// ====== Import from JSON ======
importBtn.addEventListener('click', () => importFile.click());
importFile.addEventListener('change', e => {
  const file = e.target.files[0];
  if(!file) return;
  const reader = new FileReader();
  reader.onload = () => {
    try {
      const imported = JSON.parse(reader.result);
      if(Array.isArray(imported)){
        tasks = imported;
        saveTasks();
        render();
      } else {
        showError('Invalid file format!');
      }
    } catch(err){ showError('Error reading file!'); }
  };
  reader.readAsText(file);
});

// ====== Drag & Drop Handlers ======
function handleDragStart(e){
  dragSrcEl = this;
  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/plain', this.dataset.id);
  this.classList.add('dragging');
}
function handleDragOver(e){
  e.preventDefault(); // Needed to allow drop
  e.dataTransfer.dropEffect = 'move';
}
function handleDrop(e){
  e.stopPropagation();
  const srcId = e.dataTransfer.getData('text/plain');
  const tgtId = this.dataset.id;
  if(srcId !== tgtId){
    const srcIndex = tasks.findIndex(t => t.id === srcId);
    const tgtIndex = tasks.findIndex(t => t.id === tgtId);
    const [moved] = tasks.splice(srcIndex, 1);
    tasks.splice(tgtIndex, 0, moved);
    saveTasks();
    render();
  }
}
function handleDragEnd(){
  qsa('.task-card').forEach(el => el.classList.remove('dragging'));
}

// ====== Initialize App ======
(function init(){
  loadTasks();
  render();
  const theme = localStorage.getItem('advanced_todo_theme');
  if(theme === 'dark') document.body.classList.add('dark');
})();

// ====== Extra Theme Handling (Fallback) ======
const body = document.body;
const savedTheme = localStorage.getItem("todo_theme");
if (savedTheme) {
  body.classList.add(savedTheme);
} else {
  body.classList.add("dark"); // Default
}

themeToggle.addEventListener("click", () => {
  body.classList.toggle("dark");
  body.classList.toggle("light");
  localStorage.setItem("todo_theme", body.classList.contains("dark") ? "dark" : "light");
});
