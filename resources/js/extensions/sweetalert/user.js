import { handleClick } from "./index";

// ---------------------------------
// User
document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";
    const redirect = event.target.dataset.redirect ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-user-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "akun",
                verb: "hapus",
                method: "DELETE",
            },
            uri: {
                url: `/dashboard/users`,
            },
            redirect: "/dashboard/users",
        });

    // Destroy (profile picture)
    if (
        event.target &&
        event.target.matches("[data-confirm-user-profile-picture-destroy]")
    )
        handleClick({
            data: { unique },
            event: {
                noun: "foto profil",
                verb: "hapus",
                method: "DELETE",
            },
            uri: {
                url: `/dashboard/users`,
                noun: `profile-picture`,
            },
            redirect: `/dashboard/users/details/${redirect}`,
        });

    // Destroy (your profile picture)
    if (
        event.target &&
        event.target.matches("[data-confirm-user-your-profile-picture-destroy]")
    )
        handleClick({
            data: { unique },
            event: {
                noun: "foto profil kamu",
                verb: "hapus",
                method: "DELETE",
            },
            uri: {
                url: `/dashboard/users/account/settings`,
                noun: `profile-picture`,
            },
            redirect: "/dashboard/users/account",
        });
});
