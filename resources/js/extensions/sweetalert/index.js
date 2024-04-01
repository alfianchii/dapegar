export function handleClick({ data, event, uri, redirect = uri }) {
    const config = {
        title: "Apakah kamu yakin?",
        text: `Kamu akan ${event.verb} ${event.noun} ini.`,
        icon: "question",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Iya, lanjutkan!",
        denyButtonText: `Jangan ...`,
    };

    Swal.fire(config).then(async (result) => {
        if (result.isConfirmed) {
            let url = ``;
            if (uri.noun) url = `${uri.url}/${data.unique}/${uri.noun}`;
            if (!uri.noun) url = `${uri.url}/${data.unique}`;

            console.log(url);

            const req = await fetch(url, {
                method: event.method,
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify(data),
            });

            const res = await req.json();

            const message = res.message;
            const successResponse = {
                title: "Success!",
                text: message,
                icon: "success",
            };
            const errorResponse = {
                title: "Error!",
                text: message,
                icon: "error",
            };

            if (req.ok)
                return Swal.fire(successResponse).then(
                    () => (window.location.href = redirect),
                );

            return Swal.fire(errorResponse).then(
                () => (window.location.href = redirect),
            );
        }
    });
}
