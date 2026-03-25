function analyzeText() {
    const text = document.getElementById('text').value;
    const charCount = document.getElementById('char');
    const wordCount = document.getElementById('word');
    const reserveText = document.getElementById('reserveText');

    charCount.innerHTML = text.length;

    let count = 0;
    let words = text.trim().split(' ');

    for (let i = 0; i < words.length; i++) {
        if (words[i] !== "") {
            count++;
        }
    }
    wordCount.innerHTML = count;
    reserveText.innerHTML = text.split('').reverse().join('');


}