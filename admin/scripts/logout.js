function logoutfun(){
sessionStorage.removeItem('currentUser');
window.location.href='../login.htm';
}