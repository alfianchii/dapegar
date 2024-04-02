const article = document.getElementById("article");
const fromWord = document.getElementById("from-word");
const toWord = document.getElementById("to-word");
const replaceWord = document.getElementById("replace-word");

function alterWord(fromWord, toWord, article) {
    const splitArticle = article.textContent.split(" ");
    const newArticle = generateNewArticle(splitArticle, fromWord, toWord);

    renderNewArticle(newArticle);
}

const generateNewArticle = (words, fromWord, toWord) =>
    words.map((word) => (isSameWord(word, fromWord) ? toWord : word)).join(" ");

const renderNewArticle = (newArticle) => (article.innerHTML = newArticle);

const isSameWord = (word, kata) => word.includes(kata);

replaceWord.addEventListener("click", function () {
    alterWord(fromWord.value, toWord.value, article);
});
