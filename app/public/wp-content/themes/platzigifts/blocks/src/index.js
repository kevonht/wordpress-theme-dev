import {registerBlockType} from '@wordpress/blocks';
import {TextControl} from '@wordpress/components'


registerBlockType(
    'pg/basic',
    {
        title:"Basic Block",
        description: "Este es nuestro primer bloque",
        icon: "smiley",
        category: "layout",
        attributes: {
            content: {
                type: "string",
                default: "Hello World"
            }
        },
        edit: (props) => {
            const { attributes: {content},  setAttributes, className, isSelected} =props;
            const handlerOnChangeInput = (mewContent) =>{
                setAttributes({content: mewContent})
            }
            return <TextControl
                        label="complete el campo"
                        value={content}
                        onChange={handlerOnChangeInput}
                        />
        },
        save: () => null /* (props) => <h2>{props.attributes.content}</h2> */
    }
)