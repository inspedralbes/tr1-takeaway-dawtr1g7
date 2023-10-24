export async function getLlibres() {
    const response = await fetch(`./data.json`);
    const productes =  await response.json();
    return productes;
}