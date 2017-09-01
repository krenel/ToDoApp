$('.btn-danger').click(function(){
    console.log('clicked');
    if (confirm("Are you sure you want to delete this element!"))
    {
        return true;
    }
    return false;
});