<script lang="ts">
    import Vue from "../../imports";
    import Component from "vue-class-component";
    import {Prop, Watch} from "vue-property-decorator";

    @Component
    export default class VEditDialog extends Vue {
        isActive: boolean = false;

        @Prop({type: String, default: 'Speichern'})
        saveText;

        @Prop({type: String, default: 'Abbrechen'})
        cancelText;

        @Prop({type: Boolean})
        positionAbsolutley;

        @Prop({type: Number})
        positionX;

        @Prop({type: Number})
        positionY;

        @Prop({type: Boolean})
        show;

        @Prop({type: Boolean})
        persistent;

        @Prop({type: Boolean})
        large;

        @Prop({default: null})
        returnValue;

        @Watch('show')
        onShowChange(val) {
            this.isActive = val;
        }

        @Watch('isActive')
        onIsActiveChange(val) {
            this.$emit('show', val);
            if (val) {
                this.$emit('open', val);
            }
        }

        genActivator() {
            if (this.$slots.default) {
                return this.$createElement('a', {
                    domProps: {href: 'javascript:;'},
                    slot: 'activator'
                }, this.$slots.default)
            } else {
                return '';
            }
        }

        genContent() {
            return this.$createElement('div', {
                on: {
                    keydown: e => {
                        const input = (this.$refs.content as HTMLElement).querySelector('input');
                        e.keyCode === 27 && this.cancel();
                        if (e.keyCode === 13 && input) {
                            this.save(input.value);
                            this.$emit('save', true);
                        }
                    }
                },
                ref: 'content'
            }, [this.$slots.input])
        }

        genButton(fn, text, emphasize = false) {
            return this.$createElement('v-btn', {
                'class': {'red': emphasize},
                props: {
                    flat: !emphasize,
                    light: false
                },
                on: {click: fn}
            }, text)
        }

        cancel() {
            this.isActive = false;
            this.$emit('show', false);
        }

        save(value?) {
            this.isActive = false;
            this.$emit('show', false);
        }

        genActions() {
            return this.$createElement('div', {
                'class': 'small-dialog__actions'
            }, [
                this.genButton(() => this.cancel(), this.cancelText),
                this.genButton(() => {
                    this.save(this.returnValue);
                    this.$emit('save', true);
                }, this.saveText, true)
            ])
        }

        onKeydown(e) {
            if (!this.large) {
                e.keyCode === 27 && this.cancel();
                e.keyCode === 13 && this.save();
            }
        }

        render(h) {
            const content = this.isActive ? h('div', {
                class: 'small-dialog__content',
                style: {
                    position: 'fixed',
                    top: (this.positionY || 0) + 'px',
                    left: (this.positionX || 0) + 'px',
                    zIndex: 200,
                },
                on: {
                    keydown: this.onKeydown
                }
            }, [
                this.genContent(),
                this.large ? this.genActions() : null
            ]) : null;

            const overlay = this.isActive && !this.persistent ? h('div', {
                style: { position: 'fixed', top: 0, left: 0, right: 0, bottom: 0, zIndex: 199 },
                on: { click: () => this.cancel() }
            }) : null;

            return h('span', {}, [
                this.$slots.default,
                content,
                overlay,
            ]);
        }
    }
</script>

<style>
    .small-dialog__content {
        background: #424242;
        border-radius: 4px;
        padding: 8px 16px 16px;
        min-width: 200px;
    }
    .small-dialog__actions {
        display: flex;
        justify-content: flex-end;
        padding-top: 8px;
        gap: 4px;
    }
</style>