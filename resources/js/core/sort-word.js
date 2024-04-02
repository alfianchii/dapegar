const sortWord = document.getElementById("sort-word");
const sortWordBtn = document.getElementById("sort-word-btn");
const sortWordReset = document.getElementById("sort-word-reset");
const article = document.getElementById("article");
const articleContent = article.innerHTML;

const sortAscending = (a, b) => a.localeCompare(b);
const sortDescending = (a, b) => b.localeCompare(a);

const sortWords = (words, sortType) =>
    sortType === "asc" ? words.sort(sortAscending) : words.sort(sortDescending);

const renderNewArticle = (newArticle) => (article.innerHTML = newArticle);

sortWordBtn.addEventListener("click", function () {
    const splitArticle = article.textContent.split(" ");
    const sortType = sortWord.value;
    const newArticle = sortWords(splitArticle, sortType).join(" ");

    renderNewArticle(newArticle);
});

sortWordReset.addEventListener(
    "click",
    () => (article.innerHTML = articleContent),
);
