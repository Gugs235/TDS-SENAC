import React, { useState } from "react";

import { StyleSheet, Text, View, TouchableOpacity } from "react-native";

export default function NewWindow() {
	const [board, setBoard] = useState(Array(9).fill(null));
	const [isXTurn, setIsXTurn] = useState(true);
	const [gameResult, setGameResult] = useState(null);

	const winningCombination = [
		[0, 1, 2], [3, 4, 5], [6, 7, 8],
		[0, 3, 6], [1, 4, 7], [2, 5, 8],
		[0, 4, 8], [2, 4, 6],
	];
}

// import { StyleSheet, Text, View, Image, Button } from "react-native";

// export default function App() {
// 	const handlePress = () => {
// 		alert("Você clicou no botão ! Parabéns");
// 	};

// 	return (
// 		<View style={styles.container}>
// 			<Text>Mauricio</Text>

// 			<Button title="Press Here" onPress={handlePress} />
// 		</View>
// 	);
// }

// const styles = StyleSheet.create({
// 	container: {
// 		flex: 1,
// 		backgroundColor: "#fff",
// 		alignItems: "center",
// 		justifyContent: "center",
// 	},
// });
