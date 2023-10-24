export async function getProductes() {
    const response = await fetch(`./data.json`);
    const productes =  await response.json();
    return productes;
}