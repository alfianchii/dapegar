const article = document.getElementById("article");
const articleContent = article.innerHTML;
const articleWords = article.textContent.split(" ");
const inputSearch = document.getElementById("search-word");
const searchBtn = document.getElementById("search-word-btn");
const countOfWord = document.getElementById("word-count");

const generateHighlight = (word) =>
    `<span style="background-color: yellow;">${word}</span>`;

const isSameWord = (word, target, isLowerCase = true) =>
    isLowerCase
        ? word.toLowerCase().includes(target.toLowerCase())
        : word.includes(target);

const generateSearchedArticle = (words, target) => {
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

    return { newArticle, wordsCount };
};

const renderSearchedArticle = (target) => {
    const { newArticle, wordsCount } = generateSearchedArticle(
        articleWords,
        target,
    );

    if (target) {
        article.innerHTML = newArticle;
        countOfWord.textContent = wordsCount;
        return;
    }

    article.innerHTML = articleContent;
    countOfWord.textContent = "-";
};

inputSearch.addEventListener("input", (e) =>
    renderSearchedArticle(e.target.value),
);
searchBtn.addEventListener("click", () =>
    renderSearchedArticle(inputSearch.value),
);

window.onload = () =>
    inputSearch.value ? renderSearchedArticle(inputSearch.value) : "";
