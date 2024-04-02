const article = document.getElementById("article");
const articleContent = article.innerHTML;
const articleWords = article.textContent.split(" ");
const fromWord = document.getElementById("from-word");
const toWord = document.getElementById("to-word");
const replaceWord = document.getElementById("replace-word");

function alterWord(fromWord, toWord) {
    const replacedArticle = generateReplacedArticle(
        articleWords,
        fromWord,
        toWord,
    );

    renderReplacedArticle(replacedArticle);
}

const generateReplacedArticle = (words, fromWord, toWord) =>
    words.map((word) => (isSameWord(word, fromWord) ? toWord : word)).join(" ");

const renderReplacedArticle = (replacedArticle) =>
    (article.innerHTML = replacedArticle);

const isSameWord = (word, target) => word.includes(target);

replaceWord.addEventListener("click", () =>
    alterWord(fromWord.value, toWord.value),
);
