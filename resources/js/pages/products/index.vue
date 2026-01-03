<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import { Rocket } from 'lucide-vue-next';
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableFooter,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table'
interface Product {
  id: number;
  name: string;
  price: number;
  discription: string;
}
const props = defineProps<{
  products: Product[];
}>();

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Products',
    href: '/products',
  },
];

const page = usePage();
</script>


<template>

  <Head title="Dashboard" />

  <AppLayout :breadcrumbs="breadcrumbs">

    <div class="p-4">
      <div v-if="page.props.flash?.message" class="mb-4">
        <Alert class="bg-blue-200">
          <Rocket class="h-4 w-4" />
          <AlertTitle>Notification!</AlertTitle>
          <AlertDescription>
            {{ page.props.flash.message }}
          </AlertDescription>
        </Alert>
      </div>
      <div>
        <Link href="/products/create"><Button>Create Button</Button></Link>

      </div>
      <div class="bg-white rounded-md border shadow-sm">
        <Table>
          <TableCaption>Sizning barcha mahsulotlaringiz ro'yxati.</TableCaption>
          <TableHeader>
            <TableRow>
              <TableHead class="w-[80px]">ID</TableHead>
              <TableHead>Nomi</TableHead>
              <TableHead>Tavsif</TableHead>
              <TableHead>Narxi</TableHead>
              <TableHead class="text-right">Amallar</TableHead>
            </TableRow>
          </TableHeader>
          <TableBody>
            <TableRow v-for="product in props.products" :key="product.id">
              <TableCell class="font-medium">#{{ product.id }}</TableCell>
              <TableCell class="font-semibold">{{ product.name }}</TableCell>
              <TableCell class="max-w-xs truncate">{{ product.discription }}</TableCell>
              <TableCell>${{ product.price }}</TableCell>
              <TableCell class="text-right flex justify-end gap-2">
                <!-- <Link :href="route('products.edit', product.id)"> -->
                  <Button variant="outline" size="sm" class="flex items-center gap-1">
                    <Edit class="h-3.5 w-3.5" /> Tahrirlash
                  </Button>
                <!-- </Link> -->
                </TableCell>
            </TableRow>
            
            <TableRow v-if="props.products.length === 0">
              <TableCell colspan="5" class="text-center py-10 text-gray-500">
                Hozircha mahsulotlar mavjud emas.
              </TableCell>
            </TableRow>
          </TableBody>
        </Table>
      </div>
    </div>
  </AppLayout>
</template>
