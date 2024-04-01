import { handleClick } from "./index";

// ---------------------------------
// Master agama
document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-agama-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "data master agama",
                verb: "hapus",
                method: "DELETE",
            },
            uri: {
                url: "/dashboard/master-agama",
            },
            redirect: `/dashboard/master-agama`,
        });
});
