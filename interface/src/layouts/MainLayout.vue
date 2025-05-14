<template>
    <Toolbar />
    <AddExpenseComponent :balance="1000" />
    <TableComponent />
    <AddRegisterComponent/>
    <div class="text-center q-mt-md" style="font-size: 14px; color: #292929;">
        &copy; Tovk Tech 2025
    </div>
</template>

<script setup>
import Toolbar from '@/components/Toolbar/ToolbarComponent.vue';
import AddExpenseComponent from '@/components/CardsComponent.vue';
import TableComponent from '@/components/TableComponent.vue';
import AddRegisterComponent from '@/components/Dialogs/AddRegisterComponent.vue';

</script>