document.addEventListener('DOMContentLoaded', () => {
    // Gestion de la suppression des catégories
    document.querySelectorAll('.delete-category-button').forEach(button => {
        button.addEventListener('click', function () {
            const categoryId = this.dataset.id;
            const categoryName = this.dataset.name;

            Swal.fire({
                title: `Supprimer ${categoryName} ?`,
                text: "Cette action est irréversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.action = `/categories/${categoryId}`;
                    form.method = 'POST';

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;

                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';

                    form.appendChild(csrfInput);
                    form.appendChild(methodInput);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
});
