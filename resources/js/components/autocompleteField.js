export function autocompleteField(items, initialQuery = '', initialSelected = null) {
    items = Array.isArray(items) ? items : [];

    return {
        query: initialQuery,
        selected: initialSelected,
        filtered: [],
        showAdd: false,

        filter() {
            const q = this.query.toLowerCase();
            this.filtered = items.filter(item =>
                item.name.toLowerCase().includes(q)
            );
            this.showAdd = this.filtered.length === 0 && this.query.length >= 1;
        },

        select(item) {
            this.query = item.name;
            this.selected = item;
            this.filtered = [];
            this.showAdd = false;
        },

        addNew() {
            this.selected = { id: null, name: this.query };
            this.filtered = [];
            this.showAdd = false;
        }
    };
}