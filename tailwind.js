module.exports = {
    future: {
        // removeDeprecatedGapUtilities: true,
        // purgeLayersByDefault: true,
    },
    theme: {
        extend: {
            colors: {
                brown: {
                    lighter: '#e7bd9f',
                    default: '#b79780',
                    dark: '#836d5d',
                }
            }
        },
    },
    variants: {},
    plugins: [
        require('@tailwindcss/ui'),
    ]
}
