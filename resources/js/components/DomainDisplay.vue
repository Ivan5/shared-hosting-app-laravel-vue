<template>
    <div class="w-100 mt-5">
        <div class="row">
            <div class="col-12 p-2">
                <div
                    class="categorybox w-100 align-items-center py-1"
                    @click="selectedAll()"
                >
                    <h5 class="text-center">Show All Links</h5>
                </div>
            </div>
            <div class="p-2 col-4" v-for="category in this.categories">
                <div
                    class="categorybox w-100 align-items-center py-1"
                    @click="selectedCat(category.id)"
                >
                    <h5 class="text-center">{{ category.categoryname }}</h5>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="p-2 col-4" v-for="subcategory in filteredSubCategories">
                <div
                    class="categoryboxs w-100 align-items-center py-1"
                    @click="selectedsubCat(subcategory.id)"
                >
                    <h6 class="text-center">
                        {{ subcategory.subcategoryname }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6 p-2" v-for="domain in filteredDomains">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Website name:</strong>{{ domain.title }}</p>
                        <p>
                            <strong>Website URL:</strong
                            ><a :href="domain.url">{{ domain.url }}</a
                            >{{ domain.url }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["domains", "categories", "subcategories"],
    data() {
        return {
            selectedcategory: "",
            selectedsubcategory: ""
        };
    },
    methods: {
        selectedCat(id) {
            this.selectedcategory = id;
            this.selectedsubcategory = "";
        },
        selectedsubCat(id) {
            this.selectedsubcategory = id;
        },
        selectedAll() {
            this.selectedcategory = "";
            this.selectedsubcategory = "";
        }
    },
    computed: {
        filteredSubCategories: function() {
            return this.subcategories.filter(
                item => item.category_id == this.selectedcategory
            );
        },
        filteredDomains: function() {
            if (
                this.selectedcategory === "" &&
                this.selectedsubcategory === ""
            ) {
                return this.domains;
            } else if (
                this.selectedcategory === "" &&
                this.selectedsubcategory != ""
            ) {
                return this.domains.filter(
                    item => item.subcategory_id == this.selectedsubcategory
                );
            } else if (
                this.selectedcategory != "" &&
                this.selectedsubcategory === ""
            ) {
                return this.domains.filter(
                    item => item.subcategory_id == this.selectedsubcategory
                );
            } else if (
                this.selectedcategory != "" &&
                this.selectedsubcategory != ""
            ) {
                return this.domains.filter(
                    item => item.subcategory_id == this.selectedsubcategory
                );
            }
        }
    }
};
</script>
