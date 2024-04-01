import { handleClick } from "./index";

// ---------------------------------
// Master lokasi kerja
document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (
        event.target &&
        event.target.matches("[data-confirm-lokasi-kerja-destroy]")
    )
        handleClick({
            data: { unique },
            event: {
                noun: "data master lokasi kerja",
                verb: "hapus",
                method: "DELETE",
            },
            uri: {
                url: "/dashboard/master-lokasi-kerja",
            },
            redirect: `/dashboard/master-lokasi-kerja`,
        });
});
