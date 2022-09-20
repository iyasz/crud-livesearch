let keyword = document.getElementById("keyword");
let tombolCari = document.getElementById("tombol-cari");
let container = document.getElementById("container");

keyword.addEventListener("keyup", function () {
  //object ajax
  let xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", "ajax/crud.php", true);
  xhr.send();
});
