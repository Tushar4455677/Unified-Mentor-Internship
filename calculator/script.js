// Get reference to the calculator display element
let display = document.getElementById('display');

// Variable to store the current user input (numbers & operators)
let currentInput = '';

// Variable to store memory value for memory functions (M+, M-, MR, MC)
let memory = 0;

// Tracks if the last clicked button was a memory function (prevents unwanted concatenation)
let lastClickedMemory = false;

/* ==============================
   FUNCTION: inputValue(val)
   Purpose: Handles number & operator inputs from buttons or keyboard
   ============================== */
function inputValue(val) {
    // If display shows '0', 'Error', division error, or just used memory recall — replace input instead of appending
    if (display.textContent === '0' || display.textContent === 'Error' || display.textContent === 'Cannot divide by zero' || lastClickedMemory) {
        currentInput = val; // Start fresh with the new value
        lastClickedMemory = false; // Reset memory click tracker
    } else {
        const lastChar = currentInput.slice(-1); // Get last entered character

        // Prevent user from entering two operators in a row (e.g., "5++3")
        if (["+", "-", "*", "/", "%"].includes(lastChar) && ["+", "-", "*", "/", "%"].includes(val)) {
            display.textContent = 'Error'; // Show error message
            currentInput = ''; // Reset input
            return; // Exit function
        }
        // Append new value to current input
        currentInput += val;
    }
    // Update the display with the latest input
    display.textContent = currentInput;
}

/* ==============================
   FUNCTION: squareRoot()
   Purpose: Calculates square root of the current input
   ============================== */
function squareRoot() {
    try {
        // Use eval() to evaluate current input, then calculate square root
        let result = Math.sqrt(eval(currentInput));
        currentInput = result.toString(); // Store result as string
        display.textContent = currentInput; // Update display
    } catch {
        // If invalid input, show error
        display.textContent = 'Error';
        currentInput = '';
    }
}

/* ==============================
   FUNCTION: clearDisplay()
   Purpose: Resets display and clears input
   ============================== */
function clearDisplay() {
    currentInput = ''; // Reset input string
    display.textContent = '0'; // Reset display to 0
}

/* ==============================
   FUNCTION: calculate()
   Purpose: Evaluates the entered mathematical expression
   ============================== */
function calculate() {
    try {
        // If percentage calculation is detected (e.g., "50%20" → 50% of 20)
        if (currentInput.includes('%')) {
            let parts = currentInput.split('%');
            if (parts.length === 2) {
                currentInput = (eval(parts[0]) * eval(parts[1]) / 100).toString();
            }
        } else {
            // Otherwise, evaluate the mathematical expression normally
            let result = eval(currentInput);

            // Check for division by zero
            if (!isFinite(result)) {
                currentInput = 'Cannot divide by zero';
            } else {
                currentInput = result.toString();
            }
        }
        // Update display with the result
        display.textContent = currentInput;
    } catch (e) {
        // If expression is invalid, show error
        display.textContent = 'Error';
        currentInput = '';
    }
}

/* ==============================
   FUNCTION: memoryRecall()
   Purpose: Displays the stored memory value
   ============================== */
function memoryRecall() {
    currentInput = memory.toString(); // Load memory value into input
    display.textContent = currentInput; // Show it on screen
    lastClickedMemory = true; // Mark that a memory function was just used
}

/* ==============================
   FUNCTION: memoryAdd()
   Purpose: Adds the current value to memory
   ============================== */
function memoryAdd() {
    try {
        const value = parseFloat(eval(currentInput)); // Convert input to number
        if (!isNaN(value)) {
            memory += value; // Add to stored memory
        }
        lastClickedMemory = true; // Mark memory click
    } catch {
        display.textContent = 'Error'; // Handle invalid numbers
    }
}

/* ==============================
   FUNCTION: memorySubtract()
   Purpose: Subtracts the current value from memory
   ============================== */
function memorySubtract() {
    try {
        const value = parseFloat(eval(currentInput));
        if (!isNaN(value)) {
            memory -= value; // Subtract from stored memory
        }
        lastClickedMemory = true;
    } catch {
        display.textContent = 'Error';
    }
}

/* ==============================
   FUNCTION: memoryClear()
   Purpose: Resets stored memory value to 0
   ============================== */
function memoryClear() {
    memory = 0;
    lastClickedMemory = true;
}

/* ==============================
   FUNCTION: toggleTheme()
   Purpose: Switches between light & dark mode
   ============================== */
function toggleTheme() {
    const body = document.body; // Get body element
    const label = document.getElementById('themeLabel'); // Get label element
    body.classList.toggle('light'); // Add/remove "light" class

    // Change label text based on current mode
    label.textContent = body.classList.contains('light') ? 'Dark Mode Off' : 'Dark Mode On';
}

/* ==============================
   KEYBOARD SUPPORT
   Purpose: Allows user to use keyboard to operate calculator
   ============================== */
document.addEventListener('keydown', function (e) {
    const key = e.key;

    // If a number or operator key is pressed, input it
    if (/\d/.test(key) || ['+', '-', '*', '/', '.', '%'].includes(key)) {
        inputValue(key);
    }
    // If Enter key is pressed, calculate result
    else if (key === 'Enter') {
        calculate();
    }
    // If Backspace is pressed, remove last character
    else if (key === 'Backspace') {
        currentInput = currentInput.slice(0, -1);
        display.textContent = currentInput || '0';
    }
    // If "C" or "c" is pressed, clear display
    else if (key.toLowerCase() === 'c') {
        clearDisplay();
    }
});
