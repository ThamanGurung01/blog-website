    const deleteBtn =document.getElementById('deleteButton');
    const post = document.getElementById("post");
    const action = document.getElementById("action");
    if(post && action&& deleteBtn) {
    deleteBtn.addEventListener('click', function(event) {
    event.preventDefault();
    if (confirm('Are you sure you want to delete this blog?')) {
        action.submit();
    }});
    post.addEventListener("mouseover", function() {
    action.style.opacity = 1;
    });
    post.addEventListener("mouseout", function() {
    action.style.opacity = 0;
    });
    }