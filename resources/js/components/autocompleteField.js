export function autocompleteField(items, allowAdd = true, minLength = 1) {
    items = Array.isArray(items) ? items : []

    return {
        query: '',
        filtered: [],
        selected: null,
        showAdd: false,

        filter() {
            const q = this.query.toLowerCase()
            this.filtered = items.filter(item =>
                item.name.toLowerCase().includes(q)
            )
            this.showAdd = allowAdd && this.filtered.length === 0 && this.query.length >= minLength
        },

        select(item) {
            this.query = item.name
            this.selected = item
            this.filtered = []
            this.showAdd = false
        },

        addNew() {
            this.selected = { id: null, name: this.query }
            this.filtered = []
            this.showAdd = false
        }
    }
}