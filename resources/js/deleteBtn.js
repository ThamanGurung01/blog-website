document.getElementById('deleteButton').addEventListener('click', function(event) {
event.preventDefault();
if (confirm('Are you sure you want to delete this blog?')) {
    document.getElementById('deleteForm').submit();
}});