import { handleClick } from "./index";

// ---------------------------------
// Master eselon
document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-eselon-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "data master eselon",
                verb: "hapus",
                method: "DELETE",
            },
            uri: {
                url: "/dashboard/master-eselon",
            },
            redirect: `/dashboard/master-eselon`,
        });
});
