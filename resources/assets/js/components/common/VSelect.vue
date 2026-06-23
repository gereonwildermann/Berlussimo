<script lang="ts">
    // Functional passthrough — avoids the timing issue of Vue.component('v-select')
    // being undefined at class-decorator evaluation time.
    // Preserves the original genSelectedItems normalization: single values become [value].
    export default {
        name: 'VSelect',
        functional: true,
        render(h, ctx) {
            const data: any = { ...ctx.data };
            if (data.props && data.props.value !== undefined) {
                let val = data.props.value;
                val = (val === undefined || val === null) ? [] : val;
                val = Array.isArray(val) ? val : [val];
                data.props = { ...data.props, value: val };
            }
            return h('v-select', data, ctx.children);
        }
    };
</script>