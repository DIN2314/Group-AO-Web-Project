const decreaseBtn = document.getElementById("decreaseBtn");
const increaseBtn = document.getElementById("increaseBtn");
const addc = document.getElementById("id_butADDC");
const countview = document.getElementById("id_lblcountview");
const txtcountview = document.getElementById("id_lblcountviewh");
const stock = document.getElementById("id_txtITQTY").textContent;

let count = 0;
addc.classList.add('disabled');
addc.disabled = true;

increaseBtn.onclick = function() {
    if (count < stock) {
        count++;
        countview.textContent = count;
        txtcountview.value = count;
        updateButtons();
    }
};

decreaseBtn.onclick = function() {
    if (count > 0) {
        count--;
        countview.textContent = count;
        txtcountview.value = count;
        updateButtons();
    }
};

function updateButtons() {
  countview.textContent = count;
  txtcountview.value = count;

  if (count >= stock) {
      increaseBtn.classList.add('disabled');
      increaseBtn.disabled = true;
  } else {
      increaseBtn.classList.remove('disabled');
      increaseBtn.disabled = false;
  }

  if (count <= 0) {
      decreaseBtn.classList.add('disabled');
      decreaseBtn.disabled = true;
      addc.classList.add('disabled');
      addc.disabled = true;
  } else {
      decreaseBtn.classList.remove('disabled');
      decreaseBtn.disabled = false;
      addc.classList.remove('disabled');
      addc.disabled = false;
  }
}
