<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create a Product',
        href: '/products/create',
    },
];
const Form = useForm({
    name: "",
    price: "",
    discription: "",
});
const handSubmit = ()=>{
    Form.post('/products')
};
</script>

<template>

    <Head title="Create a Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <form class="w-8/12 space-y-4" @submit.prevent="handSubmit">
                <div class="space-y-2">
                    <Label for="Product Name">Name</Label>
                    <Input type="text" placeholde="name" v-model="Form.name" />
                    <div v-if="Form.errors.name" class="text-sm text-red-600">
                        {{ Form.errors.name }}
                    </div>
                </div>
                <div class="space-y-2">
                    <Label for="Product Price">Price</Label>
                    <Input type="number" placeholde="Price" v-model="Form.price" />
                    <div v-if="Form.errors.price" class="text-sm text-red-600">
                        {{ Form.errors.price }}
                    </div>
                </div>
                <div class="space-y-2">
                    <Label for="Product Description">Discription</Label>
                    <Input type="text" placeholde="Discription" v-model="Form.discription" />
                    <div v-if="Form.errors.discription" class="text-sm text-red-600">
                        {{ Form.errors.discription }}
                    </div>
                </div>
                <Button type="submit">Add a Product</Button>
            </form>
        </div>
    </AppLayout>
</template>
