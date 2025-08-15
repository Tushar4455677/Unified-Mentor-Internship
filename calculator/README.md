
#  Calculator Project

##  Project Description
This project is a **basic calculator** built using **HTML**, **CSS**, and **JavaScript**.  
It can perform basic arithmetic operations such as **addition**, **subtraction**, **multiplication**, and **division**.  
The aim is to strengthen **front-end development skills** and improve understanding of **web technologies**.
hosted link  : https://calculator-jet-ten-96.vercel.app/

---

---

##  How to Run the Project (Step-by-Step)

### Option A — VS Code + Live Server (Recommended)
1) **Install VS Code**  
   Download: https://code.visualstudio.com/

2) **Install Live Server Extension**  
   - Open VS Code → **Extensions** (`Ctrl + Shift + X`)  
   - Search **“Live Server”** by Ritwick Dey → **Install**  
   - Reload VS Code if needed

3) **Download the Project**  
   - **Using Git:**  
     ```bash
     git clone <REPOSITORY_URL>
     ```
   - **OR** click **Code → Download ZIP** on GitHub, then **Extract** it

4) **Open the Project Folder in VS Code**  
   - Go to **File → Open Folder…**  
   - Select the folder containing `index.html`

5) **Run with Live Server**  
   - Open `index.html` in VS Code  
   - Right-click → **Open with Live Server**  
   - Browser will open automatically (e.g., `http://127.0.0.1:5500`)

---

### Option B — Without VS Code (Quick Preview)
1) Locate the `index.html` file in the project folder  
2) Double-click to open in your default browser  
> Note: Some advanced JS features may not work properly without a local server.

---

### Option C — Using a Local Server
- **Python 3:**
  ```bash
  python -m http.server 8080


##  Objectives
- Create a user-friendly calculator interface.
- Implement accurate arithmetic operations.
- Handle input via both **mouse clicks** and **keyboard**.
- Manage special cases like **division by zero**.
- Follow **BODMAS/BIDMAS** order of operations.

---

##  Features
- **Number Buttons (0–9)** and **decimal point**
- **Operators:** `+`, `-`, `*`, `/`
- **Special Buttons:**  
  - `C` → Clear input  
  - `=` → Calculate result
- **Responsive Design:** Works on desktop & mobile
- **Error Handling:** Division by zero prevention

---

##  Project Structure
calculator/
│
├── index.html # Structure of the calculator
├── style.css # Styling and layout
└── script.js # Functionality and operations
