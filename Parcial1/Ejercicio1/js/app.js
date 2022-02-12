const from = document.getElementById('from');
const to = document.getElementById('to');
const fromImage = document.getElementById('fromImage');
// fromImage.src=`./img/USD.svg`;
const toImage = document.getElementById('toImage');
// toImage.src=`./img/EUR.svg`;
from.addEventListener('change', function(){
    fromImage.src=`./img/${this.value}.svg`;
});
to.addEventListener('change', function(){
    toImage.src=`./img/${this.value}.svg`;
});