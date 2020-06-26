<template>
    <v-app>
        <v-main>
            <v-container fluid>
                <router-view>

        <!---             <router-link to="<my_route>">My Component</router-link> -->
                </router-view>
            </v-container>
        </v-main>
    </v-app>
</template>
<script>
export default {
    name: "App"
}
</script>
<style scoped>

</style>