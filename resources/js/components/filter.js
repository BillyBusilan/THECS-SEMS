document.addEventListener('DOMContentLoaded', function() {
    const filterIcon = document.getElementById('filter-icon');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const searchInput = document.getElementById('filter-search');
    const tableBody = document.querySelector('tbody');
    
    let currentFilterColumn = 'all'; // Default to search all columns
    let originalRows = []; // Store original table rows
    
    // Store original table data on page load
    if (tableBody) {
        originalRows = Array.from(tableBody.querySelectorAll('tr'));
    }
    
    if (filterIcon && dropdownMenu) {
        // Dropdown toggle functionality
        filterIcon.addEventListener('click', function(e) {
            e.stopPropagation();
            
            const iconRect = filterIcon.getBoundingClientRect();
            
            dropdownMenu.style.position = 'fixed';
            dropdownMenu.style.top = (iconRect.bottom + 5) + 'px';
            dropdownMenu.style.left = iconRect.left + 'px';
            dropdownMenu.style.zIndex = '10000';
            
            dropdownMenu.classList.toggle('show');
        });
        
        // Handle dropdown option selection
        dropdownMenu.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (e.target.tagName === 'A') {
                const selectedValue = e.target.getAttribute('data-value');
                const selectedText = e.target.textContent;
                
                // Update current filter column
                currentFilterColumn = selectedValue;
                
                // Update placeholder text to show selected filter
                if (searchInput) {
                    searchInput.placeholder = `Search by ${selectedText}...`;
                    searchInput.focus();
                }
                
                // Add visual feedback (optional)
                dropdownMenu.querySelectorAll('a').forEach(link => {
                    link.classList.remove('active');
                });
                e.target.classList.add('active');
                
                // Close dropdown
                dropdownMenu.classList.remove('show');
                
                // If there's existing search text, re-apply filter
                if (searchInput && searchInput.value.trim()) {
                    filterTable(searchInput.value.trim(), currentFilterColumn);
                }
            }
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!filterIcon.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    }
    
    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.trim();
            filterTable(searchTerm, currentFilterColumn);
        });
        
        // Clear search on Escape key
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                e.target.value = '';
                filterTable('', currentFilterColumn);
            }
        });
    }
    
    /**
     * Filter table based on search term and selected column
     */
    function filterTable(searchTerm, filterColumn) {
        if (!tableBody || originalRows.length === 0) return;
        
        // Clear current table body
        tableBody.innerHTML = '';
        
        // If no search term, show all rows
        if (!searchTerm) {
            originalRows.forEach(row => {
                tableBody.appendChild(row.cloneNode(true));
            });
            return;
        }
        
        // Define column mappings (index corresponds to table column)
        const columnMap = {
            'asset-tag': 0,
            'name': 1,
            'category': 2,
            'status': 3,
            'condition': 4,
            'brand': 5,
            'model': 6,
            'serial-number': 7,
            'purchase-price': 8,
            'purchase-date': 9,
            'specifications': 10,
            'notes': 11
        };
        
        const filteredRows = originalRows.filter(row => {
            const cells = row.querySelectorAll('td');
            
            if (filterColumn === 'all') {
                // Search all columns
                return Array.from(cells).some(cell => {
                    return cell.textContent.toLowerCase().includes(searchTerm.toLowerCase());
                });
            } else {
                // Search specific column
                const columnIndex = columnMap[filterColumn];
                if (columnIndex !== undefined && cells[columnIndex]) {
                    return cells[columnIndex].textContent.toLowerCase().includes(searchTerm.toLowerCase());
                }
                return false;
            }
        });
        
        // Add filtered rows to table
        filteredRows.forEach(row => {
            tableBody.appendChild(row.cloneNode(true));
        });
        
        // Show message if no results found
        if (filteredRows.length === 0) {
            showNoResultsMessage();
        }
    }
    
    /**
     * Show no results message
     */
    function showNoResultsMessage() {
        const noResultsRow = document.createElement('tr');
        const noResultsCell = document.createElement('td');
        
        noResultsCell.colSpan = 13; // Adjust based on your table columns
        noResultsCell.textContent = 'No equipment found matching your search criteria.';
        noResultsCell.style.textAlign = 'center';
        noResultsCell.style.fontStyle = 'italic';
        noResultsCell.style.padding = '20px';
        noResultsCell.style.color = '#666';
        
        noResultsRow.appendChild(noResultsCell);
        tableBody.appendChild(noResultsRow);
    }
    
    /**
     * Reset all filters
     */
    function resetFilters() {
        currentFilterColumn = 'all';
        if (searchInput) {
            searchInput.value = '';
            searchInput.placeholder = 'Search equipment...';
        }
        
        // Remove active states from dropdown
        if (dropdownMenu) {
            dropdownMenu.querySelectorAll('a').forEach(link => {
                link.classList.remove('active');
            });
        }
        
        // Show all rows
        filterTable('', 'all');
    }
    
    // Optional: Add a reset button functionality
    // You can call resetFilters() from anywhere in your code
    window.resetEquipmentFilters = resetFilters;
});