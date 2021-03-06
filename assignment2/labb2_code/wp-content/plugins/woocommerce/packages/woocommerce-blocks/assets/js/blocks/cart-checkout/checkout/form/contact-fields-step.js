/**
 * External dependencies
 */
import { __ } from '@wordpress/i18n';
import { FormStep } from '@woocommerce/base-components/cart-checkout';
import { ValidatedTextInput } from '@woocommerce/base-components/text-input';
import { useCheckoutContext } from '@woocommerce/base-context';
import { useCheckoutSubmit } from '@woocommerce/base-context/hooks';
import { getSetting } from '@woocommerce/settings';
import CheckboxControl from '@woocommerce/base-components/checkbox-control';

/**
 * Internal dependencies
 */
import LoginPrompt from './login-prompt';
const ContactFieldsStep = ( {
	emailValue,
	onChangeEmail,
	allowCreateAccount,
} ) => {
	const {
		customerId,
		shouldCreateAccount,
		setShouldCreateAccount,
	} = useCheckoutContext();
	const { isDisabled } = useCheckoutSubmit();

	const createAccountUI = ! customerId &&
		allowCreateAccount &&
		getSetting( 'checkoutAllowsGuest', false ) &&
		getSetting( 'checkoutAllowsSignup', false ) && (
			<CheckboxControl
				className="wc-block-checkout__create-account"
				label={ __(
					'Create an account?',
					'woocommerce'
				) }
				checked={ shouldCreateAccount }
				onChange={ ( value ) => setShouldCreateAccount( value ) }
			/>
		);

	return (
		<FormStep
			id="contact-fields"
			disabled={ isDisabled }
			className="wc-block-checkout__contact-fields"
			title={ __(
				'Contact information',
				'woocommerce'
			) }
			description={ __(
				"We'll use this email to send you details and updates about your order.",
				'woocommerce'
			) }
			stepHeadingContent={ () => <LoginPrompt /> }
		>
			<ValidatedTextInput
				id="email"
				type="email"
				label={ __( 'Email address', 'woocommerce' ) }
				value={ emailValue }
				autoComplete="email"
				onChange={ onChangeEmail }
				required={ true }
			/>
			{ createAccountUI }
		</FormStep>
	);
};

export default ContactFieldsStep;
