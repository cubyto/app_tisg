const searchBox_client = document.querySelector("#search_client"),
      iconsearch_client = document.querySelector("#icon-client"),
      cancelBtn_client = document.querySelector("#cancel-client"),
      searchInput_client = document.querySelector("#inputClient"),
      searchData_client = document.querySelector("#data-client");
iconsearch_client.onclick = () => {
  searchBox_client.classList.add("active");
  iconsearch_client.classList.add("active");
  searchInput_client.classList.add("active");
  cancelBtn_client.classList.add("active");
  searchInput_client.focus();
  if (searchInput_client.value != "") {
    var values = searchInput_client.value;
    searchData_client.classList.remove("active");
    searchData_client.innerHTML = "You just typed " + "<span style='font-weight: 500;'>" + values + "</span>";
  } else {
    searchData_client.textContent = "";
  }
}
cancelBtn_client.onclick = () => {
  searchBox_client.classList.remove("active");
  iconsearch_client.classList.remove("active");
  searchInput_client.classList.remove("active");
  cancelBtn_client.classList.remove("active");
  searchData_client.classList.toggle("active");
  searchInput_client.value = "";
}