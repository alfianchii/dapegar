import { handleClick } from "./index";

// ---------------------------------
// Master golongan pangkat
document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (
        event.target &&
        event.target.matches("[data-confirm-golongan-pangkat-destroy]")
    )
        handleClick({
            data: { unique },
            event: {
                noun: "data master golongan pangkat",
                verb: "hapus",
                method: "DELETE",
            },
            uri: {
                url: "/dashboard/master-golongan-pangkat",
            },
            redirect: `/dashboard/master-golongan-pangkat`,
        });
});
