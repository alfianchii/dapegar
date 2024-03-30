import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import fs from "fs";
import path, { resolve } from "path";
import { fileURLToPath } from "url";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const root = resolve(__dirname, "resources");

const resourceFiles = (dirPath, filesArray = []) => {
    const paths = fs.readdirSync(dirPath);

    for (const path of paths) {
        // If .blade.php file, skip it
        if (!path.includes(".blade.php")) {
            const basePath = resolve(dirPath, path);
            const pathStat = fs.statSync(basePath);
            pathStat.isDirectory()
                ? resourceFiles(basePath, filesArray)
                : filesArray.push(basePath);
        }
    }

    return filesArray;
};
const files = resourceFiles(root);

export default defineConfig({
    plugins: [laravel({ input: files })],
    server: {
        host: "0.0.0.0",
        hmr: {
            clientPort: 3000,
            host: "127.0.0.1",
        },
        port: 3000,
        open: false,
        watch: {
            usePolling: true,
        },
    },
});
