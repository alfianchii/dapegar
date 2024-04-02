const article = document.getElementById("article");
const articleContent = article.innerHTML;
const sortWord = document.getElementById("sort-word");
const sortWordBtn = document.getElementById("sort-word-btn");
const sortWordReset = document.getElementById("sort-word-reset");

const sortAscending = (a, b) => a.localeCompare(b);
const sortDescending = (a, b) => b.localeCompare(a);

const sortWords = (words, sortType) =>
    sortType === "asc" ? words.sort(sortAscending) : words.sort(sortDescending);

const renderSortedArticle = (newArticle) => (article.innerHTML = newArticle);

sortWordBtn.addEventListener("click", function () {
    const articleWords = article.textContent.split(" ");
    const sortType = sortWord.value;
    const newArticle = sortWords(articleWords, sortType).join(" ");

    renderSortedArticle(newArticle);
});

sortWordReset.addEventListener(
    "click",
    () => (article.innerHTML = articleContent),
);
