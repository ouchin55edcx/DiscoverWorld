document.getElementById('imageInput').addEventListener('change', handleFileSelect);
        
function handleFileSelect(event) {
    const input = event.target;
    const output = document.getElementById('selectedImages');
    output.innerHTML = '';

    for (const file of input.files) {
        const fileName = file.name;
        const listItem = document.createElement('div');
        listItem.textContent = fileName;
        output.appendChild(listItem);
    }
}