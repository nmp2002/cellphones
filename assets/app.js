document.addEventListener('DOMContentLoaded',function(){
  var modal = document.getElementById('modal');
  var forgotLink = document.getElementById('forgotLink');
  var cancelBtn = document.getElementById('cancelBtn');
  if(forgotLink){
    forgotLink.addEventListener('click',function(e){e.preventDefault();modal.classList.add('active');});
  }
  if(cancelBtn){cancelBtn.addEventListener('click',function(){modal.classList.remove('active');});}
});
