import { handleClick } from "./index";

// ---------------------------------
// Master unit kerja
document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (
        event.target &&
        event.target.matches("[data-confirm-unit-kerja-destroy]")
    )
        handleClick({
            data: { unique },
            event: {
                noun: "data master unit kerja",
                verb: "hapus",
                method: "DELETE",
            },
            uri: {
                url: "/dashboard/master-unit-kerja",
            },
            redirect: `/dashboard/master-unit-kerja`,
        });
});
