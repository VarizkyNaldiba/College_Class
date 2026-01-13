import './bootstrap';
import * as coreui from '@coreui/coreui';
import 'bootstrap';

// Initialize CoreUI components
document.addEventListener('DOMContentLoaded', () => {
    // Auto-initialize all CoreUI components
    const components = document.querySelectorAll('[data-coreui]');
    components.forEach(element => {
        const componentName = element.dataset.coreui;
        if (coreui[componentName]) {
            new coreui[componentName](element);
        }
    });

    // Sidebar toggle functionality
    const sidebarToggler = document.querySelector('.sidebar-toggler');
    if (sidebarToggler) {
        sidebarToggler.addEventListener('click', () => {
            document.body.classList.toggle('sidebar-show');
        });
    }

    // Mobile sidebar overlay
    let sidebarBackdrop = document.querySelector('.sidebar-backdrop');
    if (!sidebarBackdrop) {
        sidebarBackdrop = document.createElement('div');
        sidebarBackdrop.className = 'sidebar-backdrop';
        document.body.appendChild(sidebarBackdrop);
    }

    sidebarBackdrop.addEventListener('click', () => {
        document.body.classList.remove('sidebar-show');
    });

    // Close sidebar on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && document.body.classList.contains('sidebar-show')) {
            document.body.classList.remove('sidebar-show');
        }
    });

    // Modal close animation enhancement
    document.addEventListener('hidden.bs.modal', function (event) {
        // Add fade out animation class
        event.target.style.transition = 'opacity 0.3s ease-out';
    });

    // Smooth modal show
    document.addEventListener('show.bs.modal', function (event) {
        const modal = event.target;
        modal.style.display = 'block';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10);
    });
});
