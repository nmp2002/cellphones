document.addEventListener('DOMContentLoaded',function(){
  var modal = document.getElementById('modal');
  var forgotLink = document.getElementById('forgotLink');
  var cancelBtn = document.getElementById('cancelBtn');
  if(forgotLink){
    forgotLink.addEventListener('click',function(e){e.preventDefault();modal.classList.add('active');});
  }
  if(cancelBtn){cancelBtn.addEventListener('click',function(){modal.classList.remove('active');});}
});

// Password show/hide toggle
document.addEventListener('click', function (e) {
  if (e.target && e.target.classList && e.target.classList.contains('eye')) {
    var btn = e.target;
    var container = btn.closest('.password-input');
    if (!container) return;
    var input = container.querySelector('input[type="password"], input[type="text"]');
    if (!input) return;
    if (input.type === 'password') {
      input.type = 'text';
      btn.textContent = '🙈';
    } else {
      input.type = 'password';
      btn.textContent = '👁️';
    }
  }
});
