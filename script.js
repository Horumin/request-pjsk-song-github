// Function to validate form inputs
function validateForm() {
    const name = document.forms["userForm"]["name"].value;
    const song = document.forms["userForm"]["song"].value;
    const diff = document.forms["userForm"]["diff"].value;

    if (!name || !song || !diff) {
        alert("Isi semuanya!");
        return false;
    }

    const validDifficulties = ["Easy", "Normal", "Hard", "Extreme", "Master", "Append"];
    if (!validDifficulties.includes(diffValue)) {
        alert("Pilih tingkat kesulitan yang valid.");
        return false;
    }

    alert("Tingkat kesulitan yang dipilih: " + diffValue);
    return true;
}

// Function to confirm delete action
function confirmDelete() {
    return confirm("Kamu yang ingin hapus?");
}
