const article = document.getElementById("article");
const inputSearch = document.getElementById("search-word");
const countOfWord = document.getElementById("word-count");

const generateHighlight = (word) =>
    `<span style="background-color: yellow;">${word}</span>`;

const isSameWord = (word, kata) =>
    word.toLowerCase().includes(kata.toLowerCase());

const generateNewArticle = (words, target) => {
    let wordsCount = 0;
    const newArticle = words
        .map((word) => {
            if (isSameWord(word, target)) {
                wordsCount++;
                return generateHighlight(word);
            }

            return word;
        })
        .join(" ");

    return {
        newArticle,
        wordsCount,
    };
};

const renderNewArticle = (target) => {
    const splitArticle = article.textContent.split(" ");
    const { newArticle, wordsCount } = generateNewArticle(splitArticle, target);

    if (target) {
        article.innerHTML = newArticle;
        countOfWord.textContent = wordsCount;
        return;
    }
    article.innerHTML = articleContent;
    countOfWord.textContent = "-";
};

const articleContent = article.innerHTML;
inputSearch.addEventListener("input", (e) => renderNewArticle(e.target.value));

window.onload = () =>
    inputSearch.value ? renderNewArticle(inputSearch.value) : "";
