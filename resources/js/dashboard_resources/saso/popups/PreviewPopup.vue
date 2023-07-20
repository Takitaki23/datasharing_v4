<template>
     <div class="popup">
        <div class="popup-inner">
            <slot />
            {{ dataId }}
            <button
                class="popup-close btn btn-secondary mt-3"
                @click="TogglePreviewPopup()">
                Close
            </button>
        </div>
     </div>
</template>

<script>
    import { onMounted } from 'vue';
    export default {
        
        props: ["TogglePreviewPopup", "dataId",'viewModal'],
        setup(props){

            onMounted(()=>{
                // props.viewModal()
            })
        }
    }
</script>

<style scoped>
.popup {
    /* width: 100%; */
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 100;
}

.popup .popup-inner {
    position: relative;
    background: #fff;
    padding: 35px;
}
</style>