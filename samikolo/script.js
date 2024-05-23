<script src="path/to/script.js" defer></script>

const changeColorBtn = document.getElementById('changeColorBtn');
const changeColorDiv = document.getElementById('changeColorDiv');

function changeColor() {
    
    const randomColor = '#' + Math.floor(Math.random()*16777215).toString(16);
    
    changeColorDiv.style.backgroundColor = randomColor;
}
changeColorBtn.addEventListener('click', changeColor);