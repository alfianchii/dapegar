import { handleClick } from "./index";

// ---------------------------------
// Master jabatan
document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-jabatan-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "data master jabatan",
                verb: "hapus",
                method: "DELETE",
            },
            uri: {
                url: "/dashboard/master-jabatan",
            },
            redirect: `/dashboard/master-jabatan`,
        });
});
