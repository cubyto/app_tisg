const searchBox_consult = document.querySelector("#search_consult"),
      iconsearch_consult = document.querySelector("#icon-consult"),
      cancelBtn_consult = document.querySelector("#cancel-consult"),
      searchInput_consult = document.querySelector("#inputconsult"),
      searchData_consult = document.querySelector("#data-consult");
iconsearch_consult.onclick = () => {
  searchBox_consult.classList.add("active");
  iconsearch_consult.classList.add("active");
  searchInput_consult.classList.add("active");
  cancelBtn_consult.classList.add("active");
  searchInput_consult.focus();
  if (searchInput_consult.value != "") {
    var values = searchInput_consult.value;
    searchData_consult.classList.remove("active");
    searchData_consult.innerHTML = "You just typed " + "<span style='font-weight: 500;'>" + values + "</span>";
  } else {
    searchData_consult.textContent = "";
  }
}
cancelBtn_consult.onclick = () => {
  searchBox_consult.classList.remove("active");
  iconsearch_consult.classList.remove("active");
  searchInput_consult.classList.remove("active");
  cancelBtn_consult.classList.remove("active");
  searchData_consult.classList.toggle("active");
  searchInput_consult.value = "";
}