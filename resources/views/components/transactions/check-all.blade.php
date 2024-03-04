<div x-data="{
    init() {
            this.$wire.$watch('selectedTransactionIds', () => {
                this.updateCheckAllState()
            })
        },
        updateCheckAllState() {
            if (this.pageIsSelected()) {
                this.$refs.checkboxCheckAll.indeterminate = false;
                this.$refs.checkboxCheckAll.checked = true;
            } else if (this.pageIsEmpty()) {
                this.$refs.checkboxCheckAll.indeterminate = false;
                this.$refs.checkboxCheckAll.checked = false;
            } else {
                this.$refs.checkboxCheckAll.indeterminate = true;
            }
        },
        pageIsSelected() {
            return this.$wire.transactionIdsOnPage.every(id => this.$wire.selectedTransactionIds.includes(id));
        },
        pageIsEmpty() {
            return this.$wire.selectedTransactionIds.length === 0;
        },
        handleCheck(e) {
            let el = e.target;

            el.checked ? this.selectAll() : this.deselectAll();
        },
        selectAll() {
            this.$wire.transactionIdsOnPage.forEach((e) => {

                if (this.$wire.selectedTransactionIds.includes(e)) return;

                this.$wire.selectedTransactionIds.push(e);
            })
        },
        deselectAll() {
            this.$wire.selectedTransactionIds = [];
        }
}">
    <input x-ref="checkboxCheckAll" @change="handleCheck" type="checkbox"
        class="border-gray-300 rounded shadow cursor-pointer" />
</div>
