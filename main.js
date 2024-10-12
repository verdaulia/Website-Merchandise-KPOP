document.addEventListener("DOMContentLoaded", function () {
  const loggedInUser = localStorage.getItem("loggedInUser");

  if (!loggedInUser) {
    window.location.href = "index.html";
  } else {
    document.getElementById("usernameDisplay").textContent = loggedInUser;

    // Fetch list merchandise
    fetch("list_merchandise.php")
      .then((response) => response.json())
      .then((data) => {
        const listBarang = document.getElementById("listBarang");
        listBarang.innerHTML = "";
        data.forEach((barang) => {
          listBarang.innerHTML += `<li><a href="detail.html?id=${barang.id}">${barang.name}</a></li>`;
        });
      });
  }

  document.getElementById("logoutBtn")?.addEventListener("click", function () {
    localStorage.removeItem("loggedInUser");
    window.location.href = "index.html";
  });
});
