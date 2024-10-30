document.getElementById("dark-hikr-btn").addEventListener("click", function() {
    fetch("Dark_H!k!r.txt")
        .then(response => response.text())
        .then(data => {
            document.getElementById("content").innerHTML = data;
        })
        .catch(error => console.error('Error fetching the content:', error));
});

document.getElementById("admin-btn").addEventListener("click", function() {
    document.getElementById("admin-content").classList.toggle("hidden");
});

document.getElementById("login-btn").addEventListener("click", function() {
    const password = document.getElementById("admin-password").value;
    if (password === "alzyod77") {
        document.getElementById("admin-content").classList.remove("hidden");
        loadContent();
    } else {
        alert("كلمة المرور خاطئة!");
    }
});

document.getElementById("save-btn").addEventListener("click", function() {
    const content = document.getElementById("content-editor").value;
    saveContent(content);
});

function loadContent() {
    fetch("Dark_H!k!r.txt")
        .then(response => response.text())
        .then(data => {
            document.getElementById("content-editor").value = data;
        })
        .catch(error => console.error('Error fetching the content:', error));
}

function saveContent(content) {
    const blob = new Blob([content], { type: "text/plain;charset=utf-8" });
    const link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = "Dark_H!k!r.txt";
    link.click();
    alert("تم حفظ المحتوى!");
}